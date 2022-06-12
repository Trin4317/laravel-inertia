<template>
    <nav class="mt-6">
        <ul class="list-disc">
            <li><Link href="/" class="text-blue-500 hover:underline" :class="{'font-bold underline' : $page.url === '/'}">Home</Link></li>
            <li><Link href="/users" class="text-blue-500 hover:underline" :class="{'font-bold underline' : $page.url === '/users'}">Users</Link></li>
            <li><Link href="/settings" class="text-blue-500 hover:underline" :class="{'font-bold underline' : $page.url === '/settings'}">Settings</Link></li>
            <li><Link href="/logout" method="post" as="button" class="text-blue-500 hover:underline">Log out</Link></li>
        </ul>
    </nav>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: { Link },
};
</script>
