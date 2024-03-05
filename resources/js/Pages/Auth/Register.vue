<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import TextAreaInput from "@/Components/TextAreaInput.vue";
import { Core as YubinBangoCore } from "yubinbango-core2";

const form = useForm({
    name: "",
    email: "",
    tel: "",
    postcode: "",
    address: "",
    detail: "",
    password: "",
    password_confirmation: "",
    terms: false,
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};

const fetchAddress = () => {
    new YubinBangoCore(String(form.postcode), (value) => {
        form.address = value.region + value.locality + value.street;
    });
};
</script>

<template>
    <div class="bg-teal-100">
        <GuestLayout>
            <Head title="Register" />

            <div class="flex items-center justify-center p-3">
                <h1>新規登録</h1>
            </div>

            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="name" value="企業名" />

                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                        placeholder="企業名を入力"
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="mt-4">
                    <InputLabel for="email" value="メールアドレス" />

                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        placeholder="メールアドレスを入力"
                        required
                    />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel for="tel" value="電話番号" />

                    <TextInput
                        id="tel"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.tel"
                        placeholder="電話番号を入力"
                        required
                    />
                    <InputError class="mt-2" :message="form.errors.tel" />
                </div>

                <div class="mt-4">
                    <InputLabel for="postcode" value="郵便番号" />

                    <TextInput
                        id="postcode"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.postcode"
                        placeholder="郵便番号を入力"
                        required
                        @change="fetchAddress"
                    />
                </div>

                <div class="mt-4">
                    <InputLabel for="address" value="住所" />

                    <TextInput
                        id="address"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.address"
                        placeholder="住所を入力"
                        required
                    />
                </div>

                <div class="mt-4">
                    <InputLabel for="detail" value="企業詳細" />

                    <TextAreaInput
                        id="detail"
                        type="text"
                        class="mt-1 h-24 block w-full"
                        v-model="form.detail"
                        placeholder="企業詳細を入力"
                        required
                    />

                    <InputError class="mt-2" :message="form.errors.detail" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="パスワード" />

                    <TextInput
                        id="password"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password"
                        required
                        autocomplete="new-password"
                        placeholder="パスワードを入力"
                    />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-4">
                    <InputLabel
                        for="password_confirmation"
                        value="パスワード確認用"
                    />

                    <TextInput
                        id="password_confirmation"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="もう一度パスワードを入力"
                    />

                    <InputError
                        class="mt-2"
                        :message="form.errors.password_confirmation"
                    />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <Link
                        :href="route('login')"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        すでに登録済みの方はこちら
                    </Link>

                    <PrimaryButton
                        class="ml-4"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        新規登録
                    </PrimaryButton>
                </div>
            </form>
        </GuestLayout>
    </div>
</template>
