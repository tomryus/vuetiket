<template>
  <v-card>
    <v-card-title>
      Category
      <v-spacer></v-spacer>
      <v-text-field
        v-model="search"
        append-icon="search"
        label="Search"
        single-line
        hide-details
      ></v-text-field>
    </v-card-title>
    <v-data-table
      :headers="headers"
      :items="desserts"
      :search="search"
    >
      <template v-slot:items="props">
       
        
        <td>{{ props.item.name }}</td>
        <td><button class="btn btn-info btn-sm" type="button">Edit</button>
        <button class="btn btn-danger btn-sm" type="button">Delete</button></td>
      </template>
      <v-alert v-slot:no-results :value="true" color="error" icon="warning">
        Your search for "{{ search }}" found no results.
      </v-alert>
    </v-data-table>
  </v-card>
</template>

<script>
  export default {
    data () {
      return {
        search: '',
        headers: [
            
            {
                text: 'Nama Category',
                align: 'left',
                sortable: false,
                value: 'name'
            },
            { text: 'Action', value: '' },
            
        ],
        desserts: [
          {
            name: 'Frozen Yogurt',
           
           
          },
          {
            name: 'Ice cream sandwich',
            
            
          },
          {
            name: 'Eclair',
           
          },
          {
            name: 'Cupcake',
           
          },
          {
            name: 'Gingerbread',
            
          },
          {
            name: 'Jelly bean',
            
          },
          {
            name: 'Lollipop',
           
          },
          {
            name: 'Honeycomb',
           
          },
          {
            name: 'Donut',
           
          },
          {
            name: 'KitKat',
            
          }
        ]
      }
    }
  }
</script>