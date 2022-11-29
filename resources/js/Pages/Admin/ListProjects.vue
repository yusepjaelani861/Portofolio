<script setup>
import AuthContent from '@/Components/Admin/AuthContent.vue';
import axios from 'axios';

defineProps({
    projects: Object,
})
</script>

<script>
export default {
    data() {
        console.log(this.projects)
        return {
            //
        }
    },
    methods: {
        deleteProject(id) {
            if (confirm('Are you sure?')) {
                axios.delete(`/admin/projects/delete/${id}`)
                    .then(res => {
                        // window.location.href = '/admin/projects'
                        document.getElementById('project-' + id).remove()
                    })
                    .catch(err => {
                        console.log(err)
                    })
            }
        }
    }
}
</script>

<template>
    <AuthContent>
        <div class="flex justify-end p-4">
            <a href="/admin/projects/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xl rounded">
                Create Project
            </a>
        </div>
        <div v-for="project in projects.data" :key="project.id" :id="'project-' +project.id" class="mb-4 p-4">
            <div class="rounded-xl flex">
                <div class="overflow-hidden w-1/5 p-4">
                    <img class="object-cover w-44 rounded-xl border shadow-sm" :src="project.thumbnail" alt="">
                </div>
                <div class="w-3/5 p-4 relative">
                    <div class="p-4 mb-4">
                        <h1 class="text-4xl font-bold text-gray-900 mb-2">
                            {{ project.name }}
                        </h1>
                        <div class="flex">
                            <div v-for="tag in project.tags" :key="tag.id" class="bg-[#0EA5E9] rounded-full p-1 px-4 text-white font-semibold mr-2">{{ tag.name }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-1/5 p-4 flex justify-center">
                    <div class="flex justify-center items-center">
                        <button class="bg-[#0EA5E9] rounded-full p-1 px-4 text-white text-xl font-semibold mr-2">Edit</button>
                        <button @click="deleteProject(project.id)" class="bg-[rgb(233,14,14)] rounded-full p-1 px-4 text-white text-xl font-semibold mr-2">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </AuthContent>
</template>