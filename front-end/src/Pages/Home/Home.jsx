import React from 'react';
import Slider from './slider/Slider';
import Ads1 from '../../Ads/Ads1';
import Category from './Category/Category';

const Home = () => {
    return (
        <div className='min-h-screen'>
            <Slider></Slider>
            <Ads1></Ads1>
            <Category></Category>
        </div>
    );
};

export default Home;