<script setup>
import Content from '@/Components/Content.vue';


</script>

<template>
    <Content>
        <h1 class="text-5xl font-bold text-gray-900 text-center mb-4">Projects</h1>

        <div v-for="i in 4" :key="i" class="mb-4 p-4">
            <div class="rounded-xl flex">
                <div class="overflow-hidden w-1/3 p-4">
                    <img class="object-cover w-96 rounded-xl border shadow-sm" src="/images/linku.png" alt="">
                </div>
                <div class="w-2/3 p-4 relative">
                    <div class="p-4 mb-4">
                        <h1 class="text-4xl font-bold text-gray-900 mb-2">
                            My Portfolio
                        </h1>
                        <div class="flex">
                            <div class="bg-[#0EA5E9] rounded-full p-1 px-4 text-white font-semibold mr-2">VueJS
                            </div>
                            <div class="bg-[#0EA5E9] rounded-full p-1 px-4 text-white font-semibold mr-2">PHP
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <ul>
                            <li class="flex items-center mb-2" v-for="i in 4" :key="i">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>
                                <span class="text-gray-600">Providing API Service</span>
                            </li>
                        </ul>
                    </div>
                    <div class="absolute right-0 bottom-0">
                        <a href="https://linku.to"
                            class="bg-blue-600 px-4 py-2 text-white text-lg font-bold p-2 rounded-full mr-2">
                            Visit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </Content>
</template>