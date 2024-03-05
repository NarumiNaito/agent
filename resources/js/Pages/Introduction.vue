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
        <Head title="introduction" />

        <section class="text-gray-600 pt-24 py-12 bg-teal-200 body-font">
            <div
                class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center"
            >
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
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
                        class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900"
                    >
                        サービスの特徴
                    </h1>
                    <p class="mb-8 leading-relaxed">
                        地場産エージェントは簡単にお仕事依頼及び受注ができるサービスです。
                        当サービスは豊富な案件により繁忙期と閑散期でお仕事の調整ができ、
                        メーカーは勿論、中小零細企業の繋がりを広げていきます。
                        また、将来の若手職人の育成に一役買えれば幸いです。
                    </p>
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

        <header class="body-font">
            <div
                class="w-full bg-teal-300 sm:fixed sm:top-0 mx-auto flex flex-wrap p-5 flex-col md:flex-row"
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
