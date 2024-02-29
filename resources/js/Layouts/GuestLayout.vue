<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/inertia-vue3";
import Footer from "@/Components/Footer.vue";
</script>

<template>
    <div
        class="min-h-screen pb-10 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 font-serif"
    >
        <div class="mt-10">
            <Link href="/">
                <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
            </Link>
        </div>
        <div class="mt-5 text-gray-600 text-2xl">地場産エージェント</div>
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg bg-teal-300"
        >
            <slot />
        </div>
    </div>
    <Footer />
</template>
