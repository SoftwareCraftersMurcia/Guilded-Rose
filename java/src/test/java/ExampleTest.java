import org.assertj.core.util.Strings;
import org.junit.jupiter.api.Test;
import org.junit.jupiter.params.ParameterizedTest;
import org.junit.jupiter.params.provider.Arguments;
import org.junit.jupiter.params.provider.MethodSource;

import java.util.stream.Stream;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.junit.jupiter.api.Assertions.assertTrue;

public class ExampleTest {

	@Test
	public void renameMe() {
		assertTrue(true);
	}

	private static Stream<Arguments> provideStringsForIsNullOrEmpty() {
		return Stream.of(
				Arguments.of(null, true),
				Arguments.of("", true),
				Arguments.of("not empty", false)
		);
	}

	@ParameterizedTest(name = "{index} Expected result <{1}> for string <{0}>")
	@MethodSource("provideStringsForIsNullOrEmpty")
	public void exampleWithParameters(String input, boolean expected) {
		assertEquals( expected, Strings.isNullOrEmpty(input) );

	}


}
