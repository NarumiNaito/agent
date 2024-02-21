<script setup></script>

<template>
    <div
        v-if="$page.props.flash.status === 'success'"
        class="inline-flex text-white bg-indigo-500 py-2 px-2 rounded text-lg"
    >
        {{ $page.props.flash.message }}
    </div>

    <div v-if="$page.props.flash.status === 'danger'" class="bg-red-300">
        {{ $page.props.flash.message }}
    </div>
</template>
