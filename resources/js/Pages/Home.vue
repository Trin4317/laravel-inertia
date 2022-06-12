<template>
    <h1>Hello, {{ name }}!</h1>

    <p>In this series, we will use the following frameworks:</p>

    <ul>
        <li v-for="(framework, index) of frameworks" v-text="framework" v-bind:key="index"></li>
    </ul>
</template>

<script>
export default {
    props: {
        name: String,
        frameworks: Array,
    },
};
</script>
