<script setup>
import { Head, Link } from "@inertiajs/vue3";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import Footer from "@/Components/Footer.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <div class="bg-teal-300 font-serif">
        <Head title="Explanation" />

        <section class="text-gray-600 pt-48 py-12 h-full bg-teal-200 body-font">
            <h1
                class="text-center title-font sm:text-4xl text-3xl mb-4 font-medium"
            >
                ご利用の流れ
            </h1>
            <div class="container px-5 mb-10 mx-auto flex flex-wrap">
                <!-- <h1
                class="text-center py-36 mt-12 title-font sm:text-4xl text-3xl font-medium"
            >
                ご利用の流れ
            </h1> -->
                <div
                    class="flex relative pt-10 pb-20 sm:items-center md:w-2/3 mx-auto"
                >
                    <div
                        class="h-full w-6 absolute inset-0 flex items-center justify-center"
                    >
                        <div
                            class="h-full w-1 bg-gray-200 pointer-events-none"
                        ></div>
                    </div>
                    <div
                        class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-indigo-500 text-white relative title-font font-medium text-sm"
                    >
                        1
                    </div>
                    <div
                        class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row"
                    >
                        <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
                            <h2
                                class="font-medium title-font text-gray-900 mb-1 text-xl"
                            >
                                会員登録
                            </h2>
                            <p class="leading-relaxed">
                                まずは地場産エージェントに会員登録しましょう。60秒ほどで会員登録完了します。
                            </p>
                        </div>
                    </div>
                </div>
                <div
                    class="flex relative pb-20 sm:items-center md:w-2/3 mx-auto"
                >
                    <div
                        class="h-full w-6 absolute inset-0 flex items-center justify-center"
                    >
                        <div
                            class="h-full w-1 bg-gray-200 pointer-events-none"
                        ></div>
                    </div>
                    <div
                        class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-indigo-500 text-white relative title-font font-medium text-sm"
                    >
                        2
                    </div>
                    <div
                        class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row"
                    >
                        <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
                            <h2
                                class="font-medium title-font text-gray-900 mb-1 text-xl"
                            >
                                企業詳細を登録
                            </h2>
                            <p class="leading-relaxed">
                                Web上で企業詳細を登録してください。それを指標にお仕事の応募及び依頼のミスマッチを防ぎます。
                            </p>
                        </div>
                    </div>
                </div>
                <div
                    class="flex relative pb-20 sm:items-center md:w-2/3 mx-auto"
                >
                    <div
                        class="h-full w-6 absolute inset-0 flex items-center justify-center"
                    >
                        <div
                            class="h-full w-1 bg-gray-200 pointer-events-none"
                        ></div>
                    </div>
                    <div
                        class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-indigo-500 text-white relative title-font font-medium text-sm"
                    >
                        3
                    </div>
                    <div
                        class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row"
                    >
                        <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
                            <h2
                                class="font-medium title-font text-gray-900 mb-1 text-xl"
                            >
                                気になったお仕事に応募
                            </h2>
                            <p class="leading-relaxed">
                                Web上から気になるお仕事に応募できます。応募の際に条件等をしっかり確認して応募画面より応募ください。
                            </p>
                        </div>
                    </div>
                </div>
                <div
                    class="flex relative pb-10 sm:items-center md:w-2/3 mx-auto"
                >
                    <div
                        class="h-full w-6 absolute inset-0 flex items-center justify-center"
                    >
                        <div
                            class="h-full w-1 bg-gray-200 pointer-events-none"
                        ></div>
                    </div>
                    <div
                        class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-indigo-500 text-white relative title-font font-medium text-sm"
                    >
                        4
                    </div>
                    <div
                        class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row"
                    >
                        <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
                            <h2
                                class="font-medium title-font text-gray-900 mb-1 text-xl"
                            >
                                お仕事の決定
                            </h2>
                            <p class="leading-relaxed">
                                応募書類が通過すると相手方企業より連絡が来ます。詳細を打ち合わせをしてお仕事を受注してください。
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="animate-bounce [animation-delay:1s]">
                <div v-if="canLogin" class="flex justify-center">
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard')"
                        class="flex-shrink-0 rounded-full text-white bg-indigo-500 border-0 py-2 px-5 focus:outline-none hover:bg-indigo-600 text-lg mt-10 sm:mt-0"
                        >ログインページ</Link
                    >

                    <template v-else>
                        <Link
                            :href="route('login')"
                            class="flex-shrink-0 rounded-full text-white bg-indigo-500 border-0 py-2 px-5 focus:outline-none hover:bg-indigo-600 text-lg mt-10 sm:mt-0 mr-5"
                            >会員ログイン</Link
                        >

                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="flex-shrink-0 rounded-full text-white bg-indigo-500 border-0 py-2 px-5 focus:outline-none hover:bg-indigo-600 text-lg mt-10 sm:mt-0 mr-5"
                            >新規登録</Link
                        >
                    </template>
                </div>
            </div>
        </section>

        <Footer class="border-t-2 border-gray-500" />

        <header class="body-font border-b-2 border-gray-500">
            <div
                class="bg-teal-300 w-full sm:fixed sm:top-0 sm:right-0 mx-auto flex flex-wrap p-5 flex-col md:flex-row"
            >
                <a
                    class="flex title-font font-medium items-center text-gray-600 mb-4 md:mb-0"
                >
                    <Link href="/">
                        <ApplicationLogo class="block h-12 w-12 fill-current" />
                    </Link>
                    <span class="ml-3 text-xl">地場産エージェント</span>
                </a>
                <div class="flex">
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <NavLink
                            :href="route('introduction')"
                            :active="route().current('introduction')"
                        >
                            サービスの特徴
                        </NavLink>

                        <NavLink
                            :href="route('explanation')"
                            :active="route().current('explanation')"
                        >
                            ご利用の流れ
                        </NavLink>
                    </div>
                    <div class="sm:hidden">
                        <div class="pt-2 pb-3 space-y-1">
                            <ResponsiveNavLink
                                :href="route('introduction')"
                                :active="route().current('introduction')"
                            >
                                サービスの特徴
                            </ResponsiveNavLink>
                            <ResponsiveNavLink
                                :href="route('explanation')"
                                :active="route().current('explanation')"
                            >
                                ご利用の流れ
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="">
            <div
                v-if="canLogin"
                class="sm:fixed sm:top-0 sm:right-0 mt-12 mr-5 md:mt-7 text-right"
            >
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="flex-shrink-0 rounded-full text-white bg-indigo-500 border-0 py-2 px-5 focus:outline-none hover:bg-indigo-600 text-lg mt-10 sm:mt-0"
                    >ログインページ</Link
                >

                <template v-else>
                    <Link
                        :href="route('login')"
                        class="flex-shrink-0 rounded-full text-white bg-indigo-500 border-0 py-2 px-5 focus:outline-none hover:bg-indigo-600 text-lg mt-10 sm:mt-0 mr-5"
                        >会員ログイン</Link
                    >

                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="flex-shrink-0 rounded-full text-white bg-indigo-500 border-0 py-2 px-5 focus:outline-none hover:bg-indigo-600 text-lg mt-10 sm:mt-0 mr-5"
                        >新規登録</Link
                    >
                </template>
            </div>
        </div>
    </div>
</template>
