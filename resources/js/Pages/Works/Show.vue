<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { nl2br } from "@/common";

defineProps({
    work: Object,
    errors: Object,
});
</script>

<template>
    <Head title="詳細画面" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                詳細画面
            </h2>
        </template>

        <section class="text-gray-600 body-font relative">
            <div class="container px-5 py-10 mx-auto">
                <div class="flex flex-col text-center w-full mb-12">
                    <h1
                        class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900"
                    >
                        Contact Us
                    </h1>
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">
                        Whatever cardigan tote bag tumblr hexagon brooklyn
                        asymmetrical gentrify.
                    </p>
                </div>
                <div class="lg:w-1/2 md:w-2/3 mx-auto">
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
                                    {{ work.name }}
                                </div>
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label
                                    for="price"
                                    class="leading-7 text-sm text-gray-600"
                                    >単価</label
                                >
                                <div
                                    id="price"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                >
                                    {{ work.price }}
                                </div>
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label
                                    for="deadline"
                                    class="leading-7 text-sm text-gray-600"
                                    >納期目安</label
                                >
                                <div
                                    id="deadline"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                >
                                    {{ work.deadline }}
                                </div>
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label
                                    for="content"
                                    class="leading-7 text-sm text-gray-600"
                                    >業務内容</label
                                >
                                <div
                                    id="content"
                                    v-html="nl2br(work.content)"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                                ></div>
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label
                                    for="skill"
                                    class="leading-7 text-sm text-gray-600"
                                    >スキル</label
                                >
                                <div
                                    id="skill"
                                    v-html="nl2br(work.skill)"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                                ></div>
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label
                                    for="memo"
                                    class="leading-7 text-sm text-gray-600"
                                    >メモ</label
                                >
                                <div
                                    id="memo"
                                    v-html="nl2br(work.memo)"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                                ></div>
                            </div>
                        </div>

                        <label
                            for="request"
                            class="leading-7 text-sm text-gray-600"
                            >依頼状況</label
                        >
                        <div
                            id="request"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        >
                            <span v-if="work.status === 1">依頼中</span>
                            <span v-if="work.status === 0">停止中</span>
                        </div>
                        <div class="p-2 w-full">
                            <Link
                                as="button"
                                :href="route('works.edit', { work: work.id })"
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
