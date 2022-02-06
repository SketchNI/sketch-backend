<template>
    <span>
        <span @click="startConfirmingPassword">
            <slot />
        </span>

        <jet-dialog-modal :show="confirmingPassword" @close="closeModal">
            <template #title>
                {{ title }}
            </template>

            <template #content>
                {{ content }}

                <div class="mt-4">
                    <div class="input-group">
                        <jet-input name="password" ref="password" label="Password" type="password" v-model="form.password" />
                        <jet-input-error :message="form.error" class="mt-2" />
                    </div>
                </div>
            </template>

            <template #footer>
                <jet-secondary-button @click="closeModal">
                    Cancel
                </jet-secondary-button>

                <jet-button class="ml-2" @click="confirmPassword" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    {{ button }}
                </jet-button>
            </template>
        </jet-dialog-modal>
    </span>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetButton from './Button.vue'
    import JetDialogModal from './DialogModal.vue'
    import JetInput from './Input.vue'
    import JetInputError from './InputError.vue'
    import JetSecondaryButton from './SecondaryButton.vue'

    export default defineComponent({
        emits: ['confirmed'],

        props: {
            title: {
                default: 'Confirm Password',
            },
            content: {
                default: 'For your security, please confirm your password to continue.',
            },
            button: {
                default: 'Confirm',
            }
        },

        components: {
            JetButton,
            JetDialogModal,
            JetInput,
            JetInputError,
            JetSecondaryButton,
        },

        data() {
            return {
                confirmingPassword: false,
                form: {
                    password: '',
                    error: '',
                },
            }
        },

        methods: {
            startConfirmingPassword() {
                axios.get(route('password.confirmation')).then(response => {
                    if (response.data.confirmed) {
                        this.$emit('confirmed');
                    } else {
                        this.confirmingPassword = true;

                        setTimeout(() => this.$refs.password.focus(), 250)
                    }
                })
            },

            confirmPassword() {
                this.form.processing = true;

                axios.post(route('password.confirm'), {
                    password: this.form.password,
                }).then(() => {
                    this.form.processing = false;
                    this.closeModal()
                    this.$nextTick(() => this.$emit('confirmed'));
                }).catch(error => {
                    this.form.processing = false;
                    this.form.error = error.response.data.errors.password[0];
                    this.$refs.password.focus()
                });
            },

            closeModal() {
                this.confirmingPassword = false
                this.form.password = '';
                this.form.error = '';
            },
        }
    })
</script>

<style scoped>
.input-group {
    @apply border border-zinc-700 bg-zinc-900 rounded-md px-3 py-2 shadow-sm;
    @apply focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600;
    @apply transition duration-150 ease-in;
}
</style>
