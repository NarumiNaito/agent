<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import FlashMessage from "@/Components/FlashMessage.vue";
import Pagination from "@/Components/Pagination.vue";
import dayjs from "dayjs";

// defineProps({
//     contact: Object,
//     // user_id: Object,
// });
</script>

<template>
    <!-- <Head title="問合せ一覧" />

    <AuthenticatedLayout>
        <template #header> -->
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        問合せ一覧
    </h2>
    <!-- </template>
    </AuthenticatedLayout> -->
</template>
