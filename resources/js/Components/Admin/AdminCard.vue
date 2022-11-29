<script setup>

</script>

<script>
export default {
    data() {
        return {

        }
    },
    props: ['className']
}
</script>

<template>
    <div class="rounded-lg border shadow-sm p-4 m-2" :class="className">
        <slot />
    </div>
</template>