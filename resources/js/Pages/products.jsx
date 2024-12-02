import { Head } from '@inertiajs/react'
import DashboardLayout from '@/Layouts/DashboardLayout'
import { Card, Title, Grid } from '@tremor/react'

export default function Products() {
  return (
    <>
      <Head title="Products" />
      <Grid numItems={1} numItemsSm={2} numItemsLg={3} className="gap-6">
        {/* Product cards */}
      </Grid>
    </>
  )
}

Products.layout = (page) => <DashboardLayout children={page} />
