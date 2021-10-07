package br.com.GCEval.resource;

import br.com.GCEval.model.Answerdata;
import br.com.GCEval.model.Company;
import br.com.GCEval.model.Question;
import br.com.GCEval.model.Useraccount;
import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import br.com.GCEval.repository.AnswerDataRepository;
import br.com.GCEval.repository.QuestionRepository;
import java.util.ArrayList;
import javax.validation.Valid;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.ResponseBody;

@RestController
@RequestMapping("/data")
public class AnswerDataResource {

    @Autowired
    private AnswerDataRepository answerDataRepository;

    @Autowired
    private QuestionRepository questionRepository;

    @GetMapping
    public List<Answerdata> findAll() {
        return answerDataRepository.findAll();
    }

    @GetMapping("/{id}")
    public Optional<Answerdata> findById(@PathVariable Integer id) {

        Optional<Answerdata> data = answerDataRepository.findById(id);
        return data;

    }

    @GetMapping("/fromuser/{id}")
    public List<Answerdata> findByUserId(@PathVariable Integer id) {
        Useraccount c = new Useraccount();
        c.setIdUserAccount(id);
        List<Answerdata> answerData = answerDataRepository.findByUserAccount(c);
        return answerData;

    }

    @PostMapping
    public ResponseEntity<List<Answerdata>> create(@Valid @RequestBody List<Answerdata> data) {
        List<Answerdata> toReturn = new ArrayList<>();
        for (Answerdata d : data) {
            int idQuestion = d.getQuestion().getIdQuestion();
            Optional<Question> q =  questionRepository.findById(idQuestion);
            d.setSection(q.get().getSection());
            toReturn.add(answerDataRepository.save(d));
        }
        return ResponseEntity.status(HttpStatus.CREATED).body(toReturn);
    }
    
    @DeleteMapping("/{id}")
    public @ResponseBody void deleteById(@PathVariable Integer id) {
        Optional<Answerdata> c = findById(id);
        answerDataRepository.delete(c.get());
    }

}
