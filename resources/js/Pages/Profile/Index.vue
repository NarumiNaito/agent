<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import FlashMessage from "@/Components/FlashMessage.vue";
import dayjs from "dayjs";

defineProps({
    users: Array,
    // user_id: Array,
});
</script>

<template>
    <Head title="会員登録情報" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                会員登録情報
            </h2>
        </template>

        <section class="text-gray-600 body-font relative">
            <div class="container px-5 py-12 mx-auto">
                <div class="flex flex-col text-center w-full">
                    <h1
                        class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900"
                    >
                        会員登録情報
                    </h1>
                </div>
            </div>
            <div class="mx-auto flex items-center justify-center mb-1">
                <FlashMessage />
            </div>
            <div v-for="user in users" :key="user.id">
                <div class="lg:w-1/2 md:w-2/3 container mx-auto">
                    <div class="flex flex-wrap -m-2">
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label
                                    for="name"
                                    class="leading-7 text-sm text-gray-600"
                                    >案件名</label
                                >
                                <div
                                    id="name"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                >
                                    {{ user.name }}
                                </div>
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label
                                    for="email"
                                    class="leading-7 text-sm text-gray-600"
                                    >メールアドレス</label
                                >
                                <div
                                    id="email"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                >
                                    {{ user.email }}
                                </div>
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label
                                    for="tel"
                                    class="leading-7 text-sm text-gray-600"
                                    >電話番号</label
                                >
                                <div
                                    id="tel"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                >
                                    {{ user.tel }}
                                </div>
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label
                                    for="tel"
                                    class="leading-7 text-sm text-gray-600"
                                    >郵便番号</label
                                >
                                <div
                                    id="tel"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                >
                                    {{ user.postcode }}
                                </div>
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label
                                    for="tel"
                                    class="leading-7 text-sm text-gray-600"
                                    >住所</label
                                >
                                <div
                                    id="tel"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                >
                                    {{ user.address }}
                                </div>
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label
                                    for="detail"
                                    class="leading-7 text-sm text-gray-600"
                                    >企業詳細</label
                                >
                                <div
                                    id="detail"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                >
                                    {{ user.detail }}
                                </div>
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label
                                    for="created_at"
                                    class="leading-7 text-sm text-gray-600"
                                    >登録日</label
                                >
                                <div
                                    id="created_at"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                >
                                    {{
                                        dayjs(user.created_at).format(
                                            "YYYY年MM月DD日 HH時mm分"
                                        )
                                    }}
                                </div>
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label
                                    for="created_at"
                                    class="leading-7 text-sm text-gray-600"
                                    >更新日</label
                                >
                                <div
                                    id="updated_at"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                >
                                    {{
                                        dayjs(user.updated_at).format(
                                            "YYYY年MM月DD日 HH時mm分"
                                        )
                                    }}
                                </div>
                            </div>
                        </div>

                        <div class="p-8 w-full flex">
                            <Link
                                as="button"
                                :href="route('profile.edit', { user: user.id })"
                                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                            >
                                編集する
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>
