<template>
    <div class="flex flex-col rounded-lg -m-4 sm:justify-center items-center pt-6 sm:pt-0 bg-gray-800">
        <div class="mt-8">
            <slot name="logo" />
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-transparent overflow-hidden sm:rounded-lg">
            <slot />
        </div>
    </div>
</template>
