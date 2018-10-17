<template>
    <table>
        <slot></slot>
    </table>
</template>

<script>
export default 
{
    props: ['data','sort_by','order_by'],
    data: function () {
      return {
        _data: this.data,
        _sort_by: this.sort_by,
        _order_by: this.order_by,
      }
    },
    components : 
    {
        'table-thead' : '<thead><slot></slot></thead>',
        'table-tbody' : '<tbody><slot></slot></tbody>',
    },
    methods:
    {
        
    }
}
</script>