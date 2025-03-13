import { useEffect, useState } from 'react'
import './App.css'

function App() {
  const [products, setProducts] = useState([]);

  useEffect(() => {
    fetch("http://127.0.0.1:8000/api/products")
      .then((response) => response.json())
      .then((data) => setProducts(data))
      .catch((error) => console.error("Error fetching products:", error));
  }, []);
 console.log(products);
  return (
     <div>
       <div className="container mx-auto p-5">
      <h1 className="text-3xl font-bold text-center mb-6">Product List</h1>
      <table className="w-full bg-white shadow-md rounded-lg">
        <thead>
          <tr className="bg-gray-200">
            <th className="py-2 px-4">ID</th>
            <th className="py-2 px-4">Title</th>
            <th className="py-2 px-4">Image</th>
            <th className="py-2 px-4">Price</th>
            <th className="py-2 px-4">Category</th>
          </tr>
        </thead>
        <tbody>
          {products.map((product) => (
            <tr className="border-b text-center" key={product.id}>
              <td className="py-2 px-4">{product.id}</td>
              <td className="py-2 px-4">{product.title}</td>
              <td className="py-2 px-4">
                {product.image ? (
                  <img
                    src={`http://127.0.0.1:8000/storage/${product.image}`}
                    alt="Product"
                    className="w-12 mx-auto"
                  />
                ) : (
                  "No Image"
                )}
              </td>
              <td className="py-2 px-4">${product.price}</td>
              <td className="py-2 px-4">{product.category}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
     </div>
  )
}

export default App
