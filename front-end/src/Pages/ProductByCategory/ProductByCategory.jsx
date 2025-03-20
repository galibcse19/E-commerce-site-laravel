import React, { useEffect, useState } from "react";
import { useLocation, useNavigate } from "react-router-dom";

const ProductByCategory = () => {
    const location = useLocation();
    const category = location.state?.category;
    const navigate = useNavigate()
    const [data, setData] = useState([]);
    const [loading, setLoading] = useState(true);
    const baseUrl = 'http://127.0.0.1:8000/storage/';

    // if (!category || !category.category) {
    //     return <p className="text-red-500 text-center mt-10">No category selected!</p>;
    // }

    useEffect(() => {
        fetch("http://127.0.0.1:8000/api/productsAll")
            .then((res) => res.json())
            .then((fetchedData) => { 
                setData(fetchedData);
                setLoading(false);
            })
            .catch((error) => {
                console.error("Error fetching data:", error);
                setLoading(false);
            });
    }, []);

    // console.log("Selected Category:", category.category);
    // console.log("Fetched Data:", data);

    const filteredData = data.filter(
        (d) => d.category.toLowerCase() === category.category.toLowerCase()
    );

    // console.log("Filtered Data:", filteredData);

    const handleDetails =(product)=>{
        // console.log(product)
        // productDetails
        navigate('/productDetails', { state: { product } });
    }
    return (
        <div className="lg:mx-20 min-h-screen">
            <h2 className="text-2xl font-bold py-6">Products of {category.category}</h2>
            {loading ? (
                <p className="text-center">Loading...</p>
            ) : filteredData.length > 0 ? (
                <div className="grid grid-cols-4 ">
                    {filteredData.map((product) => (
                        <div onClick={()=>handleDetails(product)}  key={product.id} className=" "> 
                            <img
                                src={`${baseUrl}${product.image1}`}
                                alt={product.title}
                                className="w-32 h-32 object-cover mt-2"
                            />
                            <h3 className="text-lg font-semibold">{product.title}</h3>
                            <p>Price: {product.price} BDT</p>
                        </div>
                    ))}
                </div>
            ) : (
                <p className="text-center text-gray-500">No products found in this category.</p>
            )}
        </div>
    );
};

export default ProductByCategory;
