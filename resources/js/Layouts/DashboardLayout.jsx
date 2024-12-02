import React from 'react'
import Sidebar from '@/Components/Dashboard/Sidebar'
import Navbar from '@/Components/Dashboard/Navbar'

export default function DashboardLayout({ children }) {
  return (
    <div className="relative flex min-h-screen flex-col bg-gray-50">
      <Navbar />
      <div className="flex-1 items-start md:grid md:grid-cols-[220px_minmax(0,1fr)] md:gap-6 lg:grid-cols-[240px_minmax(0,1fr)] lg:gap-10">
        <aside className="fixed top-14 z-30 hidden h-[calc(100vh-3.5rem)] w-full shrink-0 overflow-y-auto border-r md:sticky md:block">
          <Sidebar />
        </aside>
        <main className="relative py-6 px-4 lg:gap-10 lg:py-8 lg:px-8">
          <div className="mx-auto w-full min-w-0">
            <div className="rounded-lg bg-white p-6 shadow-sm">
              {children}
            </div>
          </div>
        </main>
      </div>
    </div>
  )
}
