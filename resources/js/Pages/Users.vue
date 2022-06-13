<template>
    <Head>
        <title>Users</title>
    </Head>
    <h1 class="text-3xl">Users</h1>

    <div style="margin-top: 400px">
        <p>The current time is {{ time }}.</p>

        <Link href="/users" class="text-blue-500" preserve-scroll>Refresh</Link>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { Head } from "@inertiajs/inertia-vue3";

defineProps({
    time: String,
});
</script>
