<template>
    <jet-form-section @submitted="updatePassword">
        <template #title>
            Update Password
        </template>

        <template #description>
            Ensure your account is using a long, random password to stay secure.
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <div class="input-group">
                    <jet-input name="current_password" label="Current Password" type="password" v-model="form.current_password" />
                    <jet-input-error :message="form.errors.current_password" class="mt-2" />
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <div class="input-group">
                    <jet-input name="password" label="New Password" type="password" v-model="form.password" />
                    <jet-input-error :message="form.errors.password" class="mt-2" />
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <div class="input-group">
                    <jet-input name="password_confirmation" label="Confirm Password" type="password" v-model="form.password_confirmation" />
                    <jet-input-error :message="form.errors.password_confirmation" class="mt-2" />
                </div>
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetActionMessage from '@/Jetstream/ActionMessage.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetFormSection from '@/Jetstream/FormSection.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetLabel from '@/Jetstream/Label.vue'

    export default defineComponent({
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
        },

        data() {
            return {
                form: this.$inertia.form({
                    current_password: '',
                    password: '',
                    password_confirmation: '',
                }),
            }
        },

        methods: {
            updatePassword() {
                this.form.put(route('user-password.update'), {
                    errorBag: 'updatePassword',
                    preserveScroll: true,
                    onSuccess: () => this.form.reset(),
                    onError: () => {
                        if (this.form.errors.password) {
                            this.form.reset('password', 'password_confirmation')
                            this.$refs.password.focus()
                        }

                        if (this.form.errors.current_password) {
                            this.form.reset('current_password')
                            this.$refs.current_password.focus()
                        }
                    }
                })
            },
        },
    })
</script>

<style scoped>
.input-group {
    @apply border border-zinc-700 bg-zinc-900 rounded-md px-3 py-2 shadow-sm;
    @apply focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600;
    @apply transition duration-150 ease-in;
}
</style>
