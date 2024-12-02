import { Head } from '@inertiajs/react'
import DashboardLayout from '@/Layouts/DashboardLayout'
import { Card, Title, Table, TableHead, TableRow, TableHeaderCell, TableBody, TableCell } from '@tremor/react'

export default function Customers() {
  return (
    <>
      <Head title="Customers" />
      <Card>
        <Title>Customer List</Title>
        <Table>
          <TableHead>
            <TableRow>
              <TableHeaderCell>Name</TableHeaderCell>
              <TableHeaderCell>Email</TableHeaderCell>
              <TableHeaderCell>Status</TableHeaderCell>
            </TableRow>
          </TableHead>
          <TableBody>
            {/* Customer data rows */}
          </TableBody>
        </Table>
      </Card>
    </>
  )
}

Customers.layout = (page) => <DashboardLayout children={page} />
