<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { nl2br } from "@/common";
import { Inertia } from "@inertiajs/inertia";
import dayjs from "dayjs";
import Pagination from "@/Components/Pagination.vue";

defineProps({
    works: Object,
    errors: Object,
});

const deleteItem = (id) => {
    Inertia.delete(route("works.destroy", { work: id }), {
        onBefore: () => confirm("本当に削除しますか?"),
    });
};
</script>

<template>
    <Head title="詳細画面" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                詳細画面
            </h2>
        </template>
        <section
            class="text-gray-600 body-font md:flex items-center justify-center"
        >
            <div v-for="work in works.data" :key="work.id">
                <div class="container px-5 py-12 mx-auto">
                    <div class="flex flex-wrap -m-4">
                        <div class="p-4">
                            <div
                                class="h-full bg-teal-200 bg-opacity-75 px-8 pt-16 pb-10 rounded-lg overflow-hidden relative border-2 border-gray-500"
                            >
                                <p class="leading-relaxed mb-3">
                                    Photo booth fam kinfolk cold-pressed
                                    sriracha leggings jianbing microdosing
                                    tousled waistcoat.
                                </p>
                                <h2
                                    class="bg-gray-500 text-white px-3 py-1 tracking-widest text-xs absolute right-0 top-0 rounded-bl"
                                >
                                    案件 : {{ work.id }}
                                </h2>
                                <div class="relative">
                                    <label
                                        for="workName"
                                        class="leading-7 text-sm text-gray-600"
                                        >案件名</label
                                    >
                                    <div
                                        id="workName"
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                    >
                                        {{ work.workName }}
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
                                <p class="leading-relaxed mb-3"></p>
                                <div class="p-2 w-full leading-relaxed mb-3">
                                    <div class="relative">
                                        <label
                                            for="deadline"
                                            class="leading-7 text-sm text-gray-600"
                                            >納期目安(◯日)</label
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
                                                dayjs(work.created_at).format(
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
                                                dayjs(work.updated_at).format(
                                                    "YYYY年MM月DD日 HH時mm分"
                                                )
                                            }}
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-7 w-full flex">
                                    <Link
                                        as="button"
                                        :href="
                                            route('works.edit', {
                                                work: work.id,
                                            })
                                        "
                                        class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                                    >
                                        編集する
                                    </Link>
                                    <button
                                        @click="deleteItem(work.id)"
                                        class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg"
                                    >
                                        削除する
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <Pagination
            class="pb-10 flex justify-center"
            :links="works.links"
        ></Pagination>
    </AuthenticatedLayout>
</template>
