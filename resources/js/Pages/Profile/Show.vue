<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { nl2br } from "@/common";
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import dayjs from "dayjs";
import Pagination from "@/Components/Pagination.vue";

defineProps({
    users: Object,
    errors: Object,
});

const search = ref("");

const searchUsers = () => {
    Inertia.get(route("profile.show", { search: search.value }));
};
</script>

<template>
    <Head title="会員企業一覧" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                会員企業一覧
            </h2>
        </template>

        <div class="">
            <div class="overflow-hidden">
                <section class="text-gray-600 body-font relative">
                    <div class="container px-5 py-8 mx-auto">
                        <div class="flex flex-wrap -m-2">
                            <div class="w-full mx-auto overflow-auto mt-5">
                                <label
                                    for="footer-field"
                                    class="leading-7 text-lg rounded-md text-black"
                                    >お探しの企業を名前で検索</label
                                >

                                <div>
                                    <input
                                        type="text"
                                        name="search"
                                        v-model="search"
                                        placeholder="企業名で検索"
                                        autofocus
                                        autocomplete="username"
                                        class="rounded-md mr-5 w-72 mb-3"
                                    />
                                    <button
                                        class="bg-indigo-500 text-white py-2 px-2 rounded-md"
                                        @click="searchUsers"
                                    >
                                        検索
                                    </button>
                                </div>
                            </div>
                            <div
                                class="w-full mx-auto overflow-auto rounded-md mt-5"
                            >
                                <table
                                    class="bg-white table-auto w-full text-left whitespace-no-wrap"
                                >
                                    <thead class="">
                                        <tr>
                                            <th
                                                class="border border-gray-400 px-4 py-2 title-font tracking-wider font-medium text-gray-900 text-xs lg:text-sm bg-gray-100 rounded-tl rounded-bl"
                                            >
                                                企業名
                                            </th>
                                            <th
                                                class="border border-gray-400 px-4 py-2 title-font tracking-wider font-medium text-gray-900 text-xs bg-gray-100"
                                            >
                                                郵便番号
                                            </th>
                                            <th
                                                class="border border-gray-400 px-4 py-2 title-font tracking-wider font-medium text-gray-900 text-xs lg:text-sm bg-gray-100"
                                            >
                                                住所
                                            </th>
                                            <th
                                                class="border border-gray-400 px-4 py-2 title-font tracking-wider font-medium text-gray-900 text-xs lg:text-sm bg-gray-100"
                                            >
                                                企業詳細
                                            </th>
                                            <th
                                                class="border border-gray-400 px-4 py-2 title-font tracking-wider font-medium text-gray-900 text-xs lg:text-sm bg-gray-100"
                                            >
                                                登録日
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="user in users.data"
                                            :key="user.id"
                                        >
                                            <td
                                                class="border border-gray-400 px-4 py-3 text-xs"
                                            >
                                                {{ user.name }}
                                            </td>
                                            <td
                                                class="border border-gray-400 px-4 py-3 text-xs"
                                            >
                                                {{ user.postcode }}
                                            </td>
                                            <td
                                                class="border border-gray-400 px-4 py-3 text-xs"
                                            >
                                                {{ user.address }}
                                            </td>
                                            <td
                                                class="border border-gray-400 px-4 py-3 text-xs"
                                            >
                                                {{ user.detail }}
                                            </td>
                                            <td
                                                class="border border-gray-400 px-4 py-3 text-xs"
                                            >
                                                {{
                                                    dayjs(
                                                        user.created_at
                                                    ).format("YYYY年MM月DD日 ")
                                                }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <Pagination
                        class="mt-1 mb-7 flex justify-center"
                        :links="users.links"
                    ></Pagination>
                </section>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
