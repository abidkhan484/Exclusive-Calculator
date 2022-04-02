import axios from "axios";
import {useState, useEffect} from "react";

export default function App() {
  const [operators, setExclusiveOperator] = useState([]);
  const [number1, setNumber1] = useState("");
  const [number2, setNumber2] = useState("");
  const [result, setResult] = useState(0);
  var [selectedOperator, setSelectedOperator] = useState("");
  
  useEffect(() => {
    axios.get("http://localhost:7007/api/get-all-operators")
      .then((res) => {
        let result = res.data.data;
        let arithmetic_operators = result.map((operatorArray) => operatorArray['emoji_code']);
        setExclusiveOperator(arithmetic_operators);
        if (arithmetic_operators.length > 0) {
          setSelectedOperator(arithmetic_operators[0]);
        }
      })
      .catch((reason) => {
        console.log(reason.message);
      });
  }, []);

  const onFormSubmit = () => {
    let bodyFormData = {
      'number1': number1,
      'number2': number2,
      'emoji_code': selectedOperator,
    };

    axios({
      method: "post",
      url: "http://localhost:7007/api/check-arithmetic-operation",
      data: bodyFormData,
      headers: { "Content-Type": "application/json" },
    })
      .then(function (response) {
        //handle success
        setResult(response.data.arithmetic_result);
      })
      .catch(function (response) {
        //handle error
        console.log(response);
      });
  };

  return (
    <>
      <div>
        <input type="text" id="number1" onChange={(e) => setNumber1(e.target.value)} value={number1} />

        <select value={selectedOperator} onChange={(e) => setSelectedOperator(e.target.value)}>
          {operators.map((operator) => (
            <option key={operator} value={operator}>({operator})</option>
          ))}
        </select>

        <input type="text" id="number2" onChange={(e) => setNumber2(e.target.value)} value={number2} />

        <button onClick={onFormSubmit}>
          Calculate
        </button>
      </div>
      
      <div>Result: {result}</div>
    
    </>
  );
}