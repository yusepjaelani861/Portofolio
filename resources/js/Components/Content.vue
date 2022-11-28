<script setup>
import Navbar from './Navbar.vue';


</script>

<template>
    <div class="max-w-5xl mx-auto">
        <div class="container mx-auto">
            <Navbar />

            <main class="mt-16">
                <slot />
            </main>

            <footer class="text-lg pt-10 mt-10 border-t-2 mb-5 p-4 text-center">
                Copyright © 2022 - All right reserved by Yusep Jaelani ~ Built With
                <span class="text-red-500"><a href="https://laravel.com/">Laravel</a></span>
            </footer>
        </div>
    </div>
</template>