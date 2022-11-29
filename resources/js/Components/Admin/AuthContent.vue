<script setup>

</script>

<template>
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center mt-2 mb-4">
            <a href="/admin/dashboard" class="mt-2">
                <h1 class="text-2xl font-bold text-gray-900 mb-4">Dashboard</h1>
            </a>
            <div class="flex items-center">
                <a href="/admin/projects"
                    class="flex items-center justify-center rounded-md bg-gray-100 hover:bg-gray-400 p-2 mr-2">
                    Projects
                </a>
                <a href="/admin/dashboard"
                    class="flex items-center justify-center rounded-md bg-gray-100 hover:bg-gray-400 p-2 mr-2">
                    Account
                </a>
            </div>
        </div>

        <main class="mt-5 mb-10">
            <slot />
        </main>

        <footer class="text-lg pt-5 border-t-2 mb-5 p-4 text-center">
            Copyright © 2022 - All right reserved by Yusep Jaelani ~ Built With
            <span class="text-red-500"><a href="https://laravel.com/">Laravel</a></span>
        </footer>
    </div>
</template>