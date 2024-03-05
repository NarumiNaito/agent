<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import FlashMessage from "@/Components/FlashMessage.vue";
import Pagination from "@/Components/Pagination.vue";
import dayjs from "dayjs";

defineProps({
    works: Object,
    // user_id: Object,
});

const search = ref("");

const searchWorks = () => {
    Inertia.get(route("works.list", { search: search.value }));
};
</script>

<template>
    <Head title="依頼一覧" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                依頼一覧
            </h2>
        </template>
        <div class="w-full mx-auto overflow-auto ml-12 mt-12">
            <label
                for="footer-field"
                class="leading-7 text-lg rounded-md text-black"
                >案件名で検索</label
            >

            <div>
                <input
                    type="text"
                    name="search"
                    v-model="search"
                    placeholder="案件名で検索"
                    autofocus
                    autocomplete="workName"
                    class="rounded-md mr-5 w-72 mb-3"
                />
                <button
                    class="bg-indigo-500 text-white py-2 px-2 rounded-md"
                    @click="searchWorks"
                >
                    検索
                </button>
            </div>
        </div>
        <section
            class="text-gray-600 body-font md:flex items-center justify-center"
        >
            <div class="flex justify-center mt-10">
                <FlashMessage />
            </div>

            <div v-for="work in works.data" :key="work.id">
                <div class="container px-5 py-3 mx-auto">
                    <div class="flex justify-center flex-wrap -m-4">
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

                                <h2
                                    class="text-xl tracking-widest title-font p-2 mb-2 font-medium border-b border-gray-400"
                                >
                                    案件名 : {{ work.workName }}
                                </h2>
                                <h1
                                    class="text-xl p-2 mb-2 border-b leading-none border-gray-400"
                                >
                                    単価 : {{ work.price }} 円
                                </h1>
                                <h1
                                    class="text-xl p-2 mb-2 border-b leading-none border-gray-400"
                                >
                                    納期目安 : {{ work.deadline }} 日
                                </h1>
                                <h1
                                    class="text-xl p-2 mb-2 border-b leading-none border-gray-400"
                                >
                                    業務内容 : {{ work.content }}
                                </h1>
                                <h1
                                    class="text-xl p-2 mb-2 border-b leading-none border-gray-400"
                                >
                                    求めるスキル : {{ work.skill }}
                                </h1>

                                <h1
                                    class="text-xl p-2 mb-2 border-b leading-none border-gray-400"
                                >
                                    その他 : {{ work.memo }}
                                </h1>
                                <h1
                                    class="text-xl p-2 mb-2 border-b leading-none border-gray-400"
                                >
                                    更新日 :
                                    {{
                                        dayjs(work.updated_at).format(
                                            "YYYY年MM月DD日 HH時mm分"
                                        )
                                    }}
                                </h1>

                                <div class="flex justify-center">
                                    <Link
                                        as="button"
                                        :href="
                                            route('contacts.index', {
                                                work: work.id,
                                            })
                                        "
                                        class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                                        >お問い合せ</Link
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
        <Pagination
            class="py-12 flex justify-center"
            :links="works.links"
        ></Pagination>
    </AuthenticatedLayout>
</template>
