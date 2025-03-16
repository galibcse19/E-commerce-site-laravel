import React from 'react';
import NavBar from '../Shared/NavBar';
import { Outlet } from 'react-router-dom';
import Footer from '../Shared/Footer';

const Main = () => {
    return (
        <div className=''>
            <NavBar></NavBar>
            <div className='bg-gray-200 text-black'>
                <Outlet></Outlet>
            </div>
            <Footer></Footer>
        </div>
    );
};

export default Main;