<script setup>
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />

    <div class="bg-teal-400 font-serif">
        <div class="bg-[url('/images/bg.jpg')]">
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
                    class="text-white display-2 text-center relative title-font sm:text-4xl text-3xl mb-4 font-medium text-white"
                >
                    地場産業の活性化に向けて
                </h1>
            </section>
            <section class="h-[100px]"></section>

            <section class="text-white body-font">
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
                            class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white"
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

            <section class="text-white body-font">
                <div
                    class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center"
                >
                    <div
                        class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center"
                    >
                        <h1
                            class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white"
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
            </section>

            <footer class="text-white bg-teal-400 body-font">
                <div
                    class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col"
                >
                    <a
                        class="flex title-font font-medium items-center md:justify-start justify-center text-white"
                    >
                        <img
                            src="/images/icon.jpg"
                            fill="none"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            class="w-10 h-10 text-white p-0.5 bg-indigo-500 rounded-full"
                            viewBox="0 0 24 24"
                        />
                        <span class="ml-3 text-xl">地場産エージェント</span>
                    </a>
                    <p
                        class="text-sm text-white sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4"
                    >
                        © 2024 JibasanAgent —
                        <a
                            href="https://twitter.com/knyttneve"
                            class="text-white ml-1"
                            rel="noopener noreferrer"
                            target="_blank"
                            >jibasan@agent.com</a
                        >
                    </p>
                    <span
                        class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start"
                    >
                        <a class="text-white">
                            <svg
                                fill="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                class="w-5 h-5"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"
                                ></path>
                            </svg>
                        </a>
                        <a class="ml-3 text-white">
                            <svg
                                fill="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                class="w-5 h-5"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"
                                ></path>
                            </svg>
                        </a>
                        <a class="ml-3 text-white">
                            <svg
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                class="w-5 h-5"
                                viewBox="0 0 24 24"
                            >
                                <rect
                                    width="20"
                                    height="20"
                                    x="2"
                                    y="2"
                                    rx="5"
                                    ry="5"
                                ></rect>
                                <path
                                    d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"
                                ></path>
                            </svg>
                        </a>
                        <a class="ml-3 text-white">
                            <svg
                                fill="currentColor"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="0"
                                class="w-5 h-5"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke="none"
                                    d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"
                                ></path>
                                <circle
                                    cx="4"
                                    cy="4"
                                    r="2"
                                    stroke="none"
                                ></circle>
                            </svg>
                        </a>
                    </span>
                </div>
            </footer>
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
