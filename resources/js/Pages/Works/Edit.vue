<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
import ValidationErrors from "@/Components/ValidationErrors.vue";

const props = defineProps({
    errors: Object,
    work: Object,
});

const form = reactive({
    id: props.work.id,
    name: props.work.name,
    price: props.work.price,
    deadline: props.work.deadline,
    content: props.work.content,
    skill: props.work.skill,
    memo: props.work.memo,
    status: props.work.status,
});

const updateWork = (id) => {
    Inertia.put(route("works.update", { work: id }), form);
};
</script>

<template>
    <Head title="編集画面" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                編集画面
            </h2>
        </template>

        <ValidationErrors :errors="errors" class="text-center mt-12" />
        <section class="text-gray-600 body-font relative">
            <form @submit.prevent="updateWork(form.id)">
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
                                    <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        v-model="form.name"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    />
                                </div>
                            </div>

                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label
                                        for="price"
                                        class="leading-7 text-sm text-gray-600"
                                        >単価</label
                                    >
                                    <input
                                        type="number"
                                        id="price"
                                        name="price"
                                        v-model="form.price"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    />
                                </div>
                            </div>

                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label
                                        for="deadline"
                                        class="leading-7 text-sm text-gray-600"
                                        >納期目安</label
                                    >
                                    <input
                                        type="number"
                                        id="deadline"
                                        name="deadline"
                                        v-model="form.deadline"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    />
                                </div>
                            </div>

                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label
                                        for="content"
                                        class="leading-7 text-sm text-gray-600"
                                        >業務内容</label
                                    >
                                    <textarea
                                        id="content"
                                        name="content"
                                        v-model="form.content"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                                    ></textarea>
                                </div>
                            </div>

                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label
                                        for="skill"
                                        class="leading-7 text-sm text-gray-600"
                                        >スキル</label
                                    >
                                    <textarea
                                        id="skill"
                                        name="skill"
                                        v-model="form.skill"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                                    ></textarea>
                                </div>
                            </div>

                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label
                                        for="memo"
                                        class="leading-7 text-sm text-gray-600"
                                        >メモ</label
                                    >
                                    <textarea
                                        id="memo"
                                        name="memo"
                                        v-model="form.memo"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                                    ></textarea>
                                </div>
                            </div>

                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label
                                        for="request"
                                        class="leading-7 text-sm text-gray-600 mr-5"
                                        >依頼状況</label
                                    >
                                    <input
                                        type="radio"
                                        id="status"
                                        name="status"
                                        v-model="form.status"
                                        value="1"
                                    />
                                    <label class="ml-1 mr-4">依頼中</label>
                                    <input
                                        type="radio"
                                        id="status"
                                        name="status"
                                        v-model="form.status"
                                        value="0"
                                    />
                                    <label class="ml-1 mr-4">停止中</label>
                                </div>
                            </div>

                            <div class="p-2 w-full">
                                <button
                                    class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                                >
                                    更新する
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </AuthenticatedLayout>
</template>
