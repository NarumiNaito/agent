<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
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
    <Head title="Welcome" />
    <div class="bg-teal-300 font-serif">
        <header class="body-font">
            <div
                class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row"
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
        <div class="bg-teal-200">
            <section class="text-gray-600 body-font">
                <div
                    class="container mx-auto flex px-5 items-center justify-center flex-col"
                >
                    <div
                        class="reactive w-screen flex justify-center items-center"
                    >
                        <img
                            class="mb-10 object-cover object-center rounded"
                            alt="hero"
                            src="/images/main.jpg"
                        />

                        <h1
                            class="absolute sm:text-5xl sm:mb-24 md:text-6xl md:mb-24 lg:text-8xl lg:mb-48 text-white"
                        >
                            地場産エージェント
                        </h1>
                        <h1
                            class="absolute text-2xl md:text-3xl lg:text-5xl text-white"
                        >
                            企業と企業の架け橋へ
                        </h1>
                    </div>
                </div>
            </section>

            <section class="h-[150px]"></section>

            <section class="pt-48 pb-48 relative">
                <div
                    class="absolute w-full h-full top-0 left-0 bg-cover bg-center bg-no-repeat opacity-80 bg-fixed"
                    style="background-image: url(/images/parallax.jpg)"
                ></div>
                <h1
                    class="display-2 text-center relative title-font sm:text-4xl text-3xl mb-4 font-medium text-white"
                >
                    地場産業の活性化に向けて
                </h1>
            </section>
            <section class="h-[100px]"></section>

            <section class="text-gray-600 body-font border-b-2 border-gray-500">
                <div
                    class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center"
                >
                    <div
                        class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0"
                    >
                        <img
                            class="object-cover object-center rounded"
                            alt="hero"
                            src="https://dummyimage.com/720x600"
                        />
                    </div>
                    <div
                        class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center"
                    >
                        <h1
                            class="title-font sm:text-4xl text-3xl mb-4 font-medium"
                        >
                            お仕事を掲示板で共有
                            <br
                                class="hidden lg:inline-block"
                            />現状の依頼を見える化
                        </h1>
                        <p class="mb-8 leading-relaxed">
                            掲示板を共有することで得意不得意で仕事依頼及び受注ができ企業のミスマッチを防止し、
                            仕事先を探すリソースを省き時間と労力を効率化。
                            また請負企業も仕事を選択できることにより閑散期には受注に困らず、元請企業への早い対応が可能。
                        </p>
                    </div>
                </div>
            </section>

            <section class="text-gray-600 body-font">
                <div
                    class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center"
                >
                    <div
                        class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center"
                    >
                        <h1
                            class="title-font sm:text-4xl text-3xl mb-4 font-medium"
                        >
                            新規企業開拓で事業拡大
                            <br
                                class="hidden lg:inline-block"
                            />後世へ繋がる若手職人の育成へ
                        </h1>
                        <p class="mb-8 leading-relaxed">
                            既存の付き合いももちろん、新規企業を開拓することにより新たな発展と地場産業全体の活性化、また優れた技術力を後世の若手職人に繋ぐチャンスが広がる。
                        </p>
                    </div>
                    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                        <img
                            class="object-cover object-center rounded"
                            alt="hero"
                            src="/images/handshake.jpg"
                        />
                    </div>
                </div>
            </section>
            <section>
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

            <div class="">
                <div
                    v-if="canLogin"
                    class="sm:fixed sm:top-0 sm:right-0 p-6 text-right"
                >
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard')"
                        class="flex-shrink-0 rounded-full text-white bg-indigo-500 border-0 py-2 px-5 focus:outline-none hover:bg-indigo-600 rounded text-lg mt-10 sm:mt-0"
                        >ログインページ</Link
                    >

                    <template v-else>
                        <Link
                            :href="route('login')"
                            class="flex-shrink-0 rounded-full text-white bg-indigo-500 border-0 py-2 px-5 focus:outline-none hover:bg-indigo-600 rounded text-lg mt-10 sm:mt-0 mr-5"
                            >会員ログイン</Link
                        >

                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="flex-shrink-0 rounded-full text-white bg-indigo-500 border-0 py-2 px-5 focus:outline-none hover:bg-indigo-600 rounded text-lg mt-10 sm:mt-0 mr-5"
                            >新規登録</Link
                        >
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<style></style>
