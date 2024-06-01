import FlashMessage from '@/Components/FlashMessage';
import Navbar from '@/Layouts/Navbar';

export default function AppLayout({ header, children }) {
    return (
        <div className='min-h-screen bg-gray-100'>
            <FlashMessage />
            <Navbar />

            {header && (
                <header className='bg-white shadow'>
                    <div className='max-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8'>{header}</div>
                </header>
            )}

            <main>{children}</main>
        </div>
    );
}
