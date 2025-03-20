import React from 'react';
import { useLocation } from 'react-router-dom';

const ProductDetails = () => {
    const location = useLocation();
    const product = location.state?.product;
    // console.log(product)
    return (
        <div>
            <h2>{product.title}</h2>
        </div>
    );
};

export default ProductDetails;