<template>
    <div>
        <p>I am From D vue</p>
        <router-link :to="{path:'/e'}"><p>Click me</p></router-link>
        <router-view></router-view>
    </div>
</template>