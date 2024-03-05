<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    errors: Object,
    work: Object,
});

const urlParams = new URLSearchParams(window.location.search);
const myParam = urlParams.get("work");
// console.log(myParam);

// console.log(props);

const form = reactive({
    workId: myParam,
    subject: "",
    content: "",
});

const contactForm = () => {
    // console.log("test");
    Inertia.post(route("contacts.store"), form);
};
</script>
<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                お問い合わせ
            </h2>
        </template>

        <section class="text-gray-600 body-font relative">
            <form @submit.prevent="contactForm()">
                <div class="container px-5 py-24 mx-auto">
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
                            <div class="p-2 w-1/2">
                                <div class="relative">
                                    <label
                                        for="subject"
                                        class="leading-7 text-sm text-gray-600"
                                        >件名</label
                                    >
                                    <input
                                        type="text"
                                        id="subject"
                                        name="subject"
                                        v-model="form.subject"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    />
                                </div>
                            </div>

                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label
                                        for="content"
                                        class="leading-7 text-sm text-gray-600"
                                        >Message</label
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
                                <button
                                    class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                                >
                                    送信する
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </AuthenticatedLayout>
</template>
