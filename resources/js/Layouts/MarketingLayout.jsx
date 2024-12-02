import { PropsWithChildren } from 'react'
import Navbar from '@/Components/Marketing/Navbar'
import Footer from '@/Components/Marketing/Footer'

export default function MarketingLayout({ children }) {
  return (
    <div className="flex min-h-screen flex-col">
      <Navbar />
      <main className="flex-1">{children}</main>
      <Footer />
    </div>
  )
}
