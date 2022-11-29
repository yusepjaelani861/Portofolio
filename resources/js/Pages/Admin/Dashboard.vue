<script setup>
import AdminCard from '@/Components/Admin/AdminCard.vue';
import AuthContent from '@/Components/Admin/AuthContent.vue';
import Chart from 'chart.js/auto';

</script>

<script>
export default {
    data() {
        return {
            //
        }
    },
    mounted() {
        const ctx = document.getElementById('myChart');
        const chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'My First dataset',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [0, 10, 5, 2, 20, 30, 45]
                }]
            },

            // Configuration options go here
            options: {}
        });
    }
}
</script>

<template>
    <AuthContent>
        <div class="grid md:grid-cols-3 grid-cols-2">
            <AdminCard className="bg-blue-500">
                <h1 class="text-xl font-bold text-white">Total Project</h1>
                <h1 class="text-3xl font-bold text-white">100</h1>
            </AdminCard>
            <AdminCard className="bg-blue-500">
                <h1 class="text-xl font-bold text-white">Total Views</h1>
                <h1 class="text-3xl font-bold text-white">100</h1>
            </AdminCard>
        </div>

        <div class="p-20">
            <canvas id="myChart"></canvas>
        </div>
    </AuthContent>
</template>