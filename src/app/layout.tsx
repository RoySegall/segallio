import styles from './layout.module.scss';
import { Analytics } from '@vercel/analytics/react';

export const metadata = {
  title: 'Segall IO',
  description: 'Roy Segall website',
}

type RootLayoutProps = { children: React.ReactNode };
export default function RootLayout({children}: RootLayoutProps) {
  return (
    <html lang="en">
      <body className={styles.body}>{children}</body>
      <Analytics />
    </html>
  )
}
