<template>
    <x-head title="Log In" />

    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo/>
        </template>

        <jet-validation-errors class="mb-4"/>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div class="input-group">
                <jet-input name="email" label="Email" v-model="form.email" :autofocus="true"/>
                <jet-input-error :message="form.errors.email" class="mt-2"/>
            </div>

            <div class="input-group mt-4">
                <jet-input type="password" name="password" label="Password" v-model="form.password"
                           :autofocus="false"/>
                <jet-input-error :message="form.errors.password" class="mt-2"/>
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <jet-checkbox name="remember" v-model:checked="form.remember"/>
                    <span class="ml-2 text-zinc-200">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-link v-if="canResetPassword" :href="route('password.request')"
                        class="hover:underline transition duration-150 ease-in text-sm text-zinc-300 hover:text-blue-300">
                    Forgot your password?
                </x-link>

                <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </jet-button>
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
import { defineComponent } from 'vue'
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
import JetButton from '@/Jetstream/Button.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetCheckbox from '@/Jetstream/Checkbox.vue'
import JetInputError from '@/Jetstream/InputError'
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
import AppLayout from "@/Layouts/AppLayout";

export default defineComponent({
    components: {
        AppLayout,
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetButton,
        JetInput,
        JetCheckbox,
        JetInputError,
        JetValidationErrors,
    },

    props: {
        canResetPassword: Boolean,
        status: String
    },

    data() {
        return {
            form: this.$inertia.form({
                email: '',
                password: '',
                remember: false
            })
        }
    },

    methods: {
        submit() {
            this.form
                .transform(data => ({
                    ...data,
                    remember: this.form.remember ? 'on' : ''
                }))
                .post(this.route('login'), {
                    onFinish: () => this.form.reset('password'),
                })
        }
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
