<script setup>
import Content from '@/Components/Content.vue';


</script>

<template>
    <Content>
        <h1 class="text-5xl font-bold text-gray-900 text-center mb-4">Contact Me</h1>
        <p class="text-gray-600 text-center text-2xl font-bold mb-8">I'd like to create things fun, im open minded people, Feel free to say Hello !</p>

        <div class="grid md:grid-cols-3 grid-cols-2 basis-0 mb-20 p-4">
            <a href="https://wa.me/62895389925850" target="_blank" class="flex flex-col grow items-center p-5 m-2 card bg-base-100 hover:bg-gray-900 hover:text-white shadow-lg border rounded-lg cursor-pointer ">
                <img src="/images/whatsapp.png" class="w-24 h-24 mb-4 text-white bg-white rounded-xl p-2" />
                <span class="font-bold text-3xl mb-2">WhatsApp</span>
                <span class=" text-md">+62 895-3899-25850</span>
            </a>

            <a href="https://t.me/yusepjaelani" target="_blank" class="flex flex-col grow items-center p-5 m-2 card bg-base-100 hover:bg-gray-900 hover:text-white shadow-lg border rounded-lg cursor-pointer ">
                <img src="/images/telegram.png" class="w-24 h-24 mb-4 text-white bg-white rounded-xl p-2" />
                <span class="font-bold text-3xl mb-2">Telegram</span>
                <span class=" text-md">@yusepjaelani</span>
            </a>

            <a href="mailto:yusepjaelani861@gmail.com" target="_blank" class="flex flex-col grow items-center p-5 m-2 card bg-base-100 hover:bg-gray-900 hover:text-white shadow-lg border rounded-lg cursor-pointer ">
                <img src="/images/email.png" class="w-24 h-24 mb-4 text-white bg-white rounded-xl p-2" />
                <span class="font-bold text-3xl mb-2">Email</span>
                <span class=" text-md">yusepjaelani861@gmail.com</span>
            </a>
        </div>
    </Content>
</template>