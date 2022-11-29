<script setup>
import Content from '@/Components/Content.vue';

defineProps({
    projects: Object,
})
</script>

<script>
export default {
    data() {
        return {

        }
    }
}
</script>

<template>
    <Content>
        <h1 class="text-5xl font-bold text-gray-900 text-center mb-4">Projects</h1>

        <div v-for="project in projects" :key="project.id" class="mb-4 p-4">
            <div class="rounded-xl flex">
                <div class="overflow-hidden w-1/3 p-4">
                    <img class="object-cover w-96 rounded-xl border shadow-sm" :src="project.thumbnail" alt="">
                </div>
                <div class="w-2/3 p-4 relative">
                    <div class="p-4 mb-4">
                        <h1 class="text-4xl font-bold text-gray-900 mb-2">
                            {{ project.name }}
                        </h1>
                        <div class="flex overflow-x-auto">
                            <div v-for="tag in project.tags" :key="tag.id"
                                class="bg-[#0EA5E9] rounded-full p-1 px-4 text-white font-semibold mr-2">{{ tag.name
                                }}
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 p-4" v-html="project.description">
                    </div>
                    <div class="absolute right-0 bottom-0">
                        <a :href="'https://' + project.url"
                            target="_blank"
                            class="bg-blue-600 px-4 py-2 text-white text-lg font-bold p-2 rounded-full mr-2">
                            Visit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </Content>
</template>