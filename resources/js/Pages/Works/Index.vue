<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import FlashMessage from "@/Components/FlashMessage.vue";

defineProps({
    works: Array,
    user_id: Array,
});
</script>

<template>
    <Head title="依頼一覧" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                依頼一覧
            </h2>
        </template>

        <section class="text-gray-600 body-font overflow-hidden">
            <div class="container px-5 py-12 mx-auto">
                <div class="mx-auto flex items-center justify-center mb-11">
                    <FlashMessage />
                </div>
                <div v-for="work in works" :key="work.id">
                    <div class="flex flex-wrap -m-4">
                        <div class="p-4 w-full">
                            <div
                                class="h-full p-6 rounded-lg border-2 border-indigo-500 flex flex-col relative overflow-hidden"
                            >
                                <h2
                                    class="bg-indigo-500 text-white px-3 py-1 tracking-widest text-xs absolute right-0 top-0 rounded-bl"
                                >
                                    案件 : {{ work.id }}
                                </h2>

                                <h2
                                    class="text-xl tracking-widest title-font p-2 font-medium border-b"
                                >
                                    案件名 : {{ work.workName }}
                                </h2>
                                <h1
                                    class="text-xl p-2 mb-4 border-b border-gray-200 leading-none"
                                >
                                    単価 : {{ work.price }} 円
                                </h1>
                                <p class="flex items-center text-gray-600 mb-2">
                                    <span
                                        class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0"
                                    >
                                        <svg
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2.5"
                                            class="w-3 h-3"
                                            viewBox="0 0 24 24"
                                        >
                                            <path d="M20 6L9 17l-5-5"></path>
                                        </svg> </span
                                    >仕事内容 : {{ work.content }}
                                </p>
                                <p class="flex items-center text-gray-600 mb-2">
                                    <span
                                        class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0"
                                    >
                                        <svg
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2.5"
                                            class="w-3 h-3"
                                            viewBox="0 0 24 24"
                                        >
                                            <path d="M20 6L9 17l-5-5"></path>
                                        </svg> </span
                                    >依頼状況 :
                                    <span v-if="work.status === 1">依頼中</span>
                                    <span v-if="work.status === 0">停止中</span>
                                </p>

                                <div class="flex justify-center">
                                    <Link
                                        as="button"
                                        :href="
                                            route('works.show', {
                                                work: work.id,
                                            })
                                        "
                                        class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                                        >詳細を見る</Link
                                    >
                                </div>
                                <!-- <p class="text-xs text-gray-500 mt-3 text-r">
                                    登録日 : {{ work.created_at }}
                                </p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>
