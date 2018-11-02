<style type="text/css">
    .quadroDashboard
    {
        transition: 1s;
        cursor: pointer;
    }
    .quadroDashboard:hover
    {
        background-color: #dbecff;
        transition: 1s;
    }
</style>

<template>
    <div class="col-lg col-md-6 col-sm-6 mb-4" >
        <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex quadroDashboard" @click="irAoQuadro()">
                <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">{{ title }}</span>
                        <h6 class="stats-small__value count my-3">{{ value }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

export default 
{
    props: ['title','value','route'],
    methods:
    {
        irAoQuadro()
        {
            return window.location.href = this.route;
        }
    }
}
</script>