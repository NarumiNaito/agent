<script setup></script>

<template>
    <!-- <Transition
        enter-from-class="opacity-0"
        leave-to-class="opacity-0"
        class="transition ease-in-out"
    > -->
    <div
        v-if="$page.props.flash.status === 'success'"
        class="inline-flex text-white bg-indigo-500 py-2 px-2 rounded text-lg"
    >
        {{ $page.props.flash.message }}
    </div>

    <div
        v-if="$page.props.flash.status === 'danger'"
        class="inline-flex text-white bg-red-500 py-2 px-2 rounded text-lg"
    >
        {{ $page.props.flash.message }}
    </div>
    <!-- </Transition> -->
</template>
