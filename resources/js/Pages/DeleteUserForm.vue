<script setup>
import DangerButton from "@/Components/DangerButton.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Modal from "@/Components/Modal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { nextTick, ref } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: "",
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.delete(route("profile.destroy"), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <Head title="アカウント削除" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                アカウント削除
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section class="space-y-6">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                アカウント削除はこちら
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                アカウントが削除されると、そのリソースとデータはすべて削除されます。
                            </p>
                        </header>

                        <DangerButton @click="confirmUserDeletion"
                            >削除する</DangerButton
                        >

                        <Modal
                            :show="confirmingUserDeletion"
                            @close="closeModal"
                        >
                            <div class="p-6">
                                <h2 class="text-lg font-medium text-gray-900">
                                    本当にアカウントを削除しますか？
                                </h2>

                                <p class="mt-1 text-sm text-gray-600">
                                    アカウントが削除されると、すべてのリソースとデータは永久に削除されます。
                                    宜しければパスワードを入力し削除ボタンを押してください。
                                </p>

                                <div class="mt-6">
                                    <InputLabel
                                        for="password"
                                        value="Password"
                                        class="sr-only"
                                    />

                                    <TextInput
                                        id="password"
                                        ref="passwordInput"
                                        v-model="form.password"
                                        type="password"
                                        class="mt-1 block w-3/4"
                                        placeholder="パスワードを入力"
                                        @keyup.enter="deleteUser"
                                    />

                                    <InputError
                                        :message="form.errors.password"
                                        class="mt-2"
                                    />
                                </div>

                                <div class="mt-6 flex justify-end">
                                    <SecondaryButton @click="closeModal">
                                        編集に戻る
                                    </SecondaryButton>

                                    <DangerButton
                                        class="ml-3"
                                        :class="{
                                            'opacity-25': form.processing,
                                        }"
                                        :disabled="form.processing"
                                        @click="deleteUser"
                                    >
                                        削除する
                                    </DangerButton>
                                </div>
                            </div>
                        </Modal>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
