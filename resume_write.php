<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="process_resume_write.php" method="post">
      <table>
        <tr>
          <th>이름</th><td><input type="text" name="name"></td>
        </tr>
        <tr>
          <th>생년월일</th><td><input type="date" name="birthday"></td>
        </tr>
        <tr>
          <th>성별</th>
          <td>
            <select name="gender">
              <option value="male">남자</option>
              <option value="female">여자</option>
            </select>
          </td>
        </tr>
        <tr>
          <th>이메일</th><td><input type="text" name="email"></td>
        </tr>
        <tr>
          <th>휴대폰</th><td><input type="text" name="phone"></td>
        </tr>
        <tr>
          <th>주소</th><td><input type="text" name="address"></td>
        </tr>
        <tr>
          <th>학력사항</th>
          <td>
            <table>
              <tr>
                <th>최종학력</th>
                <td>
                  <select name="final_school">
                    <option value="고등학교 졸업">고등학교 졸업</option>
                    <option value="대학교 졸업">대학교 졸업</option>
                  </select>
                </td>
              </tr>
              <tr>
                <th>학교이름</th>
                <td><input type="text" name="school_name"></td>
              </tr>
              <tr>
                <th>재학기간</th>
                <td>
                  <input type="date" name="school_period_start">~<input type="date" name="school_period_end">
                </td>
              </tr>
              <tr>
                <th>전공</th>
                <td><input type="text" name="major"></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <th>경력사항</th>
          <td>
            <table>
              <tr>
                <th>회사이름</th>
                <td><input type="text" name="corporate_name"></td>
              </tr>
              <tr>
                <th>재직기간</th>
                <td>
                  <input type="date" name="service_period_start">~<input type="date" name="service_period_end">
                </td>
              </tr>
              <tr>
                <th>근무부서</th><td><input type="text" name="department"></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
      <button type="submit">입력</button>
    </form>
  </body>
</html>
