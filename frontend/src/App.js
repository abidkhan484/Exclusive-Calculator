import axios from "axios";
import {useState, useEffect} from "react";
import { CONSTATNTS } from "./Constants";

export default function App() {
  const base_url = CONSTATNTS['API_BASE_URL_WITH_PORT'];
  const [operators, setExclusiveOperator] = useState([]);
  const [number1, setNumber1] = useState("");
  const [number2, setNumber2] = useState("");
  const [result, setResult] = useState(0);
  var [selectedOperator, setSelectedOperator] = useState("");
  
  useEffect(() => {
    axios.get(`${base_url}/api/get-all-operators`)
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
      'emoji_code': selectedOperator ?? "",
    };

    axios({
      method: "post",
      url: `${base_url}/api/check-arithmetic-operation`,
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

  const hexToUtf8 = (hex) => {
    return decodeURIComponent('%' + hex.match(/.{1,2}/g).join('%'));
  };

  return (
    <>
      <div>
        <input type="text" id="number1" onChange={(e) => setNumber1(e.target.value)} value={number1} />

        <select value={selectedOperator} onChange={(e) => setSelectedOperator(e.target.value)}>
          {operators.map((operator) => (
            <option key={operator} value={operator}>{hexToUtf8(operator)}</option>
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