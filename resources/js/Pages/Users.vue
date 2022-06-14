<template>

    <Head>
        <title>Users</title>
    </Head>
    <h1 class="text-3xl">Users</h1>

    <ul>
        <li v-for="user in users" :key="user.id" v-text="user.name" />
    </ul>
</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3';

defineProps({
    users: Array,
});
</script>
