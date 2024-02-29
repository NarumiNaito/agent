<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { reactive } from "vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";

const props = defineProps({
    errors: Object,
    user: Object,
});

const form = reactive({
    id: props.user.id,
    name: props.user.name,
    tel: props.user.tel,
    postcode: props.user.postcode,
    address: props.user.address,
    detail: props.user.detail,
});

const updateUser = (id) => {
    Inertia.put(route("profile.update", { user: id }), form);
};
</script>

<template>
    <Head title="会員情報編集" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                会員情報編集画面
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <ValidationErrors :errors="errors" class="text-center mt-12" />

                <section class="text-gray-600 body-font relative">
                    <div v-for="form in user" :key="form.id">
                        <form @submit.prevent="updateUser(user.id)">
                            <div class="container px-5 py-10 mx-auto">
                                <div
                                    class="flex flex-col text-center w-full mb-12"
                                >
                                    <h1
                                        class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900"
                                    >
                                        編集画面
                                    </h1>
                                    <p
                                        class="lg:w-2/3 mx-auto leading-relaxed text-base"
                                    >
                                        編集に間違えがないかご確認ください。
                                    </p>
                                </div>
                                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                    <div class="flex flex-wrap -m-2">
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label
                                                    for="name"
                                                    class="leading-7 text-sm text-gray-600"
                                                    >企業名</label
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
                                                    for="tel"
                                                    class="leading-7 text-sm text-gray-600"
                                                    >電話番号</label
                                                >
                                                <input
                                                    type="string"
                                                    id="tel"
                                                    name="tel"
                                                    v-model="form.tel"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                />
                                            </div>
                                        </div>

                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label
                                                    for="postcode"
                                                    class="leading-7 text-sm text-gray-600"
                                                    >郵便番号</label
                                                >
                                                <input
                                                    type="string"
                                                    id="postcode"
                                                    name="postcode"
                                                    v-model="form.postcode"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                />
                                            </div>
                                        </div>

                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label
                                                    for="address"
                                                    class="leading-7 text-sm text-gray-600"
                                                    >住所</label
                                                >
                                                <input
                                                    id="address"
                                                    name="address"
                                                    v-model="form.address"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                />
                                            </div>
                                        </div>

                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label
                                                    for="detail"
                                                    class="leading-7 text-sm text-gray-600"
                                                    >企業詳細</label
                                                >
                                                <textarea
                                                    id="detail"
                                                    name="detail"
                                                    v-model="form.detail"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                                                ></textarea>
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
                    </div>
                </section>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
